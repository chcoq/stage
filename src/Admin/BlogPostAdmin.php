<?php
//3.1. Bootstrapping de la classe Admin
// src/Admin/BlogPostAdmin.php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class BlogPostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
//        3.2. Configuration du mappeur de formulaire
        $formMapper
            ->add('title', TextType::class)
            ->add('body', TextareaType::class)
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        // ... configure $listMapper
    }
}