<style>
    .nav-link2.active {
        color: red;
    }
</style>

<div class="card-body">
    <div class="col-12">
        <div class="flex-column ">
            <ul>
                <li>
                    <a class="nav-link2 <?= ($this->uri->segment(2) == 'tentang_kami') ? 'active' : '' ?>" href="<?=base_url()?>information/tentang_kami">Tentang Kami</a>
                </li>
                <li>
                    <a class="nav-link2 <?= ($this->uri->segment(2) == 'kebijakan_privasi') ? 'active' : '' ?>" href="<?=base_url()?>information/kebijakan_privasi">Kebijakan Privasi</a>
                </li>
                <li>
                    <a class="nav-link2 <?= ($this->uri->segment(2) == 'cara_order') ? 'active' : '' ?>" href="<?=base_url()?>information/cara_order">Order & Refund</a>
                </li>
                <li>
                    <a class="nav-link2 <?= ($this->uri->segment(2) == 'syarat_ketentuan') ? 'active' : '' ?>" href="<?=base_url()?>information/syarat_ketentuan">Syarat & ketentuan</a>
                </li>
            </ul>

        </div>
    </div>
</div>