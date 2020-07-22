<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class : Login (LoginController)
 * Login class to control to authenticate user credentials and starts user's session.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class Account extends CI_Controller
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->isLoggedIn();
    }

    /**
     * This function used to check the user is logged in or not
     */
    function isLoggedIn()
    {
        $isLoggedIn = $this->session->userdata('isLoggedIn');

        if (!isset($isLoggedIn) || $isLoggedIn != TRUE) {
            $this->load->view('pages/login');
        } else {
            redirect('homes/details');
        }
    }

    function hashPass()
    {
        $options = [
            'cost' => 10,
        ];

        echo password_hash("isbal", PASSWORD_DEFAULT);
    }

    function verifyHashedPassword($plainPassword = 'isbal', $hashedPassword = '$2y$10$/iZJo98uUsTYalmqOwYaeeoVI4G3fDYVFhp8ZJudeJpXWtBvf5su2')
    {
        // $res = password_verify($plainPassword, $hashedPassword) ? 'true' : 'false';

        // echo $res;

        return password_verify($plainPassword, $hashedPassword) ? true : false;
    }

    function loginProcess($email = 'yono@email.com', $password = 'isbal')
    {
        $this->db->select('BaseTbl.customer_id, BaseTbl.customer_password, BaseTbl.customer_name');
        $this->db->from('tbl_customer as BaseTbl');
        $this->db->where('BaseTbl.customer_email', $email);
        $query = $this->db->get();

        $user = $query->result();

        // var_dump($user[0]->customer_password);
        // die;

        if (!empty($user)) {
            if (verifyHashedPassword($password, $user[0]->customer_password)) {
                echo "betul";
                die;
                return $user;
            } else {
                echo 'salah1';
                die;
                return array();
            }
        } else {
            echo 'salah';
            die;
            return array();
        }
    }

    /**
     * This function used to logged in user
     */
    public function submit_login()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('username', 'Email', 'required|valid_email|max_length[128]|trim');
        $this->form_validation->set_rules('pword', 'Password', 'required|max_length[32]');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $email = $this->input->post('username'); //'yono@email.com'; 
            $password = $this->input->post('pword'); //'isbal'; 
            

            $result = $this->login_model->loginProcess($email, $password);

            if (count($result) > 0) {
                foreach ($result as $res) {
                    $sessionArray = array(
                        'userId' => $res->customer_id,
                        'name' => $res->customer_name,
                        'isLoggedIn' => TRUE
                    );

                    $this->session->set_userdata($sessionArray);

                    // update session
                    $this->db->where('customer_id', $res->customer_id);
                    $this->db->update('tbl_customer', array('customer_sess' => $this->session->session_id));

                    redirect('homes');
                }
            } else {
                $this->session->set_flashdata('error', 'Email or password mismatch');

                redirect('/account');
            }
        }
    }

    /**
     * This function used to load forgot password view
     */
    public function forgotPassword()
    {
        $this->load->view('auth/forgotPassword');
    }

    /**
     * This function used to generate reset password request link
     */
    function resetPasswordUser()
    {
        $status = '';

        $this->load->library('form_validation');

        $this->form_validation->set_rules('login_email', 'Email', 'trim|required|valid_email|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->forgotPassword();
        } else {
            $email = $this->input->post('login_email');

            if ($this->login_model->checkEmailExist($email)) {
                $encoded_email = urlencode($email);

                $this->load->helper('string');
                $data['email'] = $email;
                $data['activation_id'] = random_string('alnum', 15);
                $data['createdDtm'] = date('Y-m-d H:i:s');
                $data['agent'] = getBrowserAgent();
                $data['client_ip'] = $this->input->ip_address();

                $save = $this->login_model->resetPasswordUser($data);

                if ($save) {
                    $data1['reset_link'] = base_url() . "resetPasswordConfirmUser/" . $data['activation_id'] . "/" . $encoded_email;
                    $userInfo = $this->login_model->getCustomerInfoByEmail($email);

                    if (!empty($userInfo)) {
                        $data1["name"] = $userInfo[0]->name;
                        $data1["email"] = $userInfo[0]->email;
                        $data1["message"] = "Reset Your Password";
                    }

                    $sendStatus = resetPasswordEmail($data1);

                    if ($sendStatus) {
                        $status = "send";
                        setFlashData($status, "Reset password link sent successfully, please check mails.");
                    } else {
                        $status = "notsend";
                        setFlashData($status, "Email has been failed, try again.");
                    }
                } else {
                    $status = 'unable';
                    setFlashData($status, "It seems an error while sending your details, try again.");
                }
            } else {
                $status = 'invalid';
                setFlashData($status, "This email is not registered with us.");
            }
            redirect('/forgotPassword');
        }
    }

    // This function used to reset the password 
    function resetPasswordConfirmUser($activation_id, $email)
    {
        // Get email and activation code from URL values at index 3-4
        $email = urldecode($email);

        // Check activation id in database
        $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);

        $data['email'] = $email;
        $data['activation_code'] = $activation_id;

        if ($is_correct == 1) {
            $this->load->view('auth/newPassword', $data);
        } else {
            redirect('/login');
        }
    }

    // This function used to create new password
    function createPasswordUser()
    {
        $status = '';
        $message = '';
        $email = $this->input->post("email");
        $activation_id = $this->input->post("activation_code");

        $this->load->library('form_validation');

        $this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|max_length[20]');

        if ($this->form_validation->run() == FALSE) {
            $this->resetPasswordConfirmUser($activation_id, urlencode($email));
        } else {
            $password = $this->input->post('password');
            $cpassword = $this->input->post('cpassword');

            // Check activation id in database
            $is_correct = $this->login_model->checkActivationDetails($email, $activation_id);

            if ($is_correct == 1) {
                $this->login_model->createPasswordUser($email, $password);

                $status = 'success';
                $message = 'Password changed successfully';
            } else {
                $status = 'error';
                $message = 'Password changed failed';
            }

            setFlashData($status, $message);

            redirect("/login");
        }
    }

    public function logout()
    {

        $email = $this->session->unset_userdata('userId');
        $name = $this->session->unset_userdata('name');
        $id = $this->session->unset_userdata('isLoggedIn');

        if ($email == FALSE) {
            redirect('account');
        }
    }

    public function register()
    {
        $data['flash'] = $this->session->flashdata('item');
        $this->load->view('pages/register', $data);
    }

    public function signup_process()
    {
        $submit = $this->input->post('submit');

        if ($submit == "Submit") {
            // process the form
            $this->load->library('form_validation');
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required|max_length[20]');
            $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]|max_length[20]');
            $this->form_validation->set_rules('mobile', 'Telpon', 'trim|required|numeric|min_length[5]|max_length[13]');

            if ($this->form_validation->run() == TRUE) {
                $data = $this->customer_data_post();
                $url = base_url().'account';

                if ($this->input->post('agree') == 'Agree') {
                    // create subscribe account
                    $data_sub['email'] = $data['customer_email'];
                    $data_sub['status'] = 1;
                    $data_sub['created_at'] = time();

                    $this->db->insert('tbl_subscribe', $data_sub);

                    $flash_msg = "The user account were successfully added. Please <a href='".$url."'>Login</a> to continue";
                    $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('account/register');
                } else {
                    $this->db->insert('tbl_customer', $data);

                    $flash_msg = "The user account were successfully added. Please <a href='".$url."'>Login</a> to continue";
                    $value = '<div class="alert alert-success alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>' . $flash_msg . '</div>';
                    $this->session->set_flashdata('item', $value);
                    redirect('account/register');
                }
            }
        }
    }

    function customer_data_post() {
        $data['customer_name'] = $this->input->post('username', true);
        $data['customer_password'] = getHashedPassword($this->input->post('password', true));
        $data['customer_email'] = $this->input->post('email', true);
        $data['customer_phone'] = $this->input->post('mobile', true);
        $data['created_at'] = time();

        return $data;
    }
}
