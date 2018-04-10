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
    protected function configureFormFields(FormMapper $formMapper)
    {
//        3.2. Configuration du mappeur de formulaire
        $formMapper
            ->with('Content')//3.4. Utilisation de groupes
                ->add('title', TextType::class)
                ->add('body', TextareaType::class)
            ->end()

            ->with('Meta data')//3.4. Utilisation de groupes
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
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        //
    }
}