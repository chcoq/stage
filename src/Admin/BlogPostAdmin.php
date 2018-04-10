<?php
//3.1. Bootstrapping de la classe Admin
// src/Admin/BlogPostAdmin.php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sonata\AdminBundle\Form\Type\ModelType;

class BlogPostAdmin extends AbstractAdmin
{
    public function toString($object)//permet de sérialiser les chaine de caractère
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
//        3.2. Configuration du mappeur de formulaire
        $formMapper
            ->tab('Post')//3.4.1. Utilisation des onglets
                ->with('Content', ['class' => 'col-md-9'])//3.4. Utilisation de groupes
                    ->add('title', TextType::class)
                    ->add('body', TextareaType::class)
                ->end()
            ->end()

            ->tab('Publish Options')//3.4.1. Utilisation des onglets
                ->with('Meta data', ['class' => 'col-md-3'])//3.4. Utilisation de groupes
    //            3.3. Ajout de champs référençant d'autres modèles
                ->add('category', EntityType::class, [
                    'class' => Category::class,
                    'choice_label' => 'name',
                ])

    //            3.3.1. Utilisation du type de modèle Sonate
                    ->add('category', ModelType::class, [
                        'class' => Category::class,
                        'property' => 'name',
                    ])
                ->end()
            ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        //4.1. Configuration du mappeur de liste
        $listMapper
            ->addIdentifier('title')
            //4.1.2. Affichage d'autres modèles
            ->add('category.name')
            ->add('draft')
        ;
    }
}