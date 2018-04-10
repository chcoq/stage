<?php
//3.1. Bootstrapping de la classe Admin
// src/Admin/BlogPostAdmin.php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BlogPostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        // ... configure $formMapper
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        // ... configure $listMapper
    }
}