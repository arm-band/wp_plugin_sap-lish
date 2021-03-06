<?php
/*
Plugin Name: ๐บ๐๐บ
Description: ้ๅฌ้่จไบ ( private posts ) ใ่ณผ่ชญ่ ( subscriber ) ใงใ้ฒ่ฆงๅฏ่ฝใซใใ็ฐกๆใชใใฉใฐใคใณใ
Version: 0.0.3
Author: ใขใซใ ๏ผใใณใ
*/

/**
 * sapLish (๐บ๐๐บ) : ใใฉใฐใคใณๆๅนๆใ้ๅฌ้่จไบ ( private posts ) ใ่ณผ่ชญ่ ( subscriber ) ใงใ้ฒ่ฆงๅฏ่ฝใซใใใ็กๅนๆใใใฎๆจฉ้ใๅ้คใใ
 */
class sapLish
{
    protected $role = 'subscriber';
    protected $privilege = 'read_private_posts';

    /**
     * __construct : ใณใณในใใฉใฏใฟใใใฉใฐใคใณๆๅนๆใป็กๅนๆใใใชใฌใผใซใใฆๅฏพๅฟใใใกใฝใใใๅผใถ
     *
     */
    public function __construct() {
        // ๆๅนๅใฎ้ใซ็บๅ
        register_activation_hook(
            __FILE__,
            [
                $this,
                'enumaElis',
            ]
        );
        // ็กๅนๅใฎ้ใซ็บๅ
        register_deactivation_hook(
            __FILE__,
            [
                $this,
                'sapLish',
            ]
        );
    }

    /**
     * enumaElis (๐๐ก๐  ๐๐บ) : ่ณผ่ชญ่ใซใ้ๅฌ้่จไบใ้ฒ่ฆงใใๆจฉ้ใไปไธ
     *
     */
    public function enumaElis ()
    {
        $subscriber = get_role( $this->role );
        $subscriber->add_cap( $this->privilege );
    }
    /**
     * sapLish (๐บ๐๐บ) : ่ณผ่ชญ่ใใ้ๅฌ้่จไบใ้ฒ่ฆงใใๆจฉ้ใๅฅๅฅช
     *
     */
    public function sapLish ()
    {
        $subscriber = get_role( $this->role );
        $subscriber->remove_cap( $this->privilege );
    }
}

// instantiate
$ab_wp_plugin_sapLish = new sapLish();
