<?php
/*
Plugin Name: 𒉺𒅁𒇺
Description: 非公開記事 ( private posts ) を購読者 ( subscriber ) でも閲覧可能にする簡易なプラグイン。
Version: 0.0.3
Author: アルム＝バンド
*/

/**
 * sapLish (𒉺𒅁𒇺) : プラグイン有効時、非公開記事 ( private posts ) を購読者 ( subscriber ) でも閲覧可能にする。無効時、その権限を削除する
 */
class sapLish
{
    protected $role = 'subscriber';
    protected $privilege = 'read_private_posts';

    /**
     * __construct : コンストラクタ。プラグイン有効時・無効時をトリガーにして対応するメソッドを呼ぶ
     *
     */
    public function __construct() {
        // 有効化の際に発動
        register_activation_hook(
            __FILE__,
            [
                $this,
                'enumaElis',
            ]
        );
        // 無効化の際に発動
        register_deactivation_hook(
            __FILE__,
            [
                $this,
                'sapLish',
            ]
        );
    }

    /**
     * enumaElis (𒂊𒉡𒈠 𒂊𒇺) : 購読者にも非公開記事を閲覧する権限を付与
     *
     */
    public function enumaElis ()
    {
        $subscriber = get_role( $this->role );
        $subscriber->add_cap( $this->privilege );
    }
    /**
     * sapLish (𒉺𒅁𒇺) : 購読者から非公開記事を閲覧する権限を剥奪
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
