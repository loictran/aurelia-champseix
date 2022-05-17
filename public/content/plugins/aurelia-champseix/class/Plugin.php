<?php

namespace Aurelia;

class Plugin
{
    public function __construct()
    {
        add_action('init',[$this, 'therapyPostType']);

    }

    /**
     * 
     * CUSTOM POST TYPE "Thérapie"
     */
    public function therapyPostType()
    {
        register_post_type(
            'therapy',
            [
                'label' => 'Thérapies',
                'public' => true,
                'hierarchical' => false,
                'menu_icon' => 'dashicons-universal-access',
                'supports' => [
                    'title',
                    'editor',
                ],
                'capability_type' => 'therapy',
                'map_meta_cap' => true,
                //'has_archive' => true
            ]
        ); 
    }

    public function addCapAdmin($customCapArray)
    {
        $role = get_role('administrator');
        foreach ($customCapArray as $customCap) {
            $role->add_cap('delete_others_' . $customCap . 's');
            $role->add_cap('delete_private_' . $customCap . 's');
            $role->add_cap('delete_' . $customCap . 's');
            $role->add_cap('delete_published_' . $customCap . 's');
            $role->add_cap('edit_others_' . $customCap . 's');
            $role->add_cap('edit_private_' . $customCap . 's');
            $role->add_cap('edit_' . $customCap . 's');
            $role->add_cap('edit_published_' . $customCap . 's');
            $role->add_cap('publish_' . $customCap . 's');
            $role->add_cap('read_private_' . $customCap . 's');
        }
    } 

    public function activate()
    {
        $this->addCapAdmin(['therapy']);
    }

    public function deactivate()
    {
        
    }
}