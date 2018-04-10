<?php
// src/Admin/CategoryAdmin.php
namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategoryAdmin extends AbstractAdmin
{
//Ces lignes configurent quels champs sont affichés
// sur l'édition et créent des actions.
// Le FormMappercomportement est similaire à celui FormBuilder
// du composant Formulaire Symfony;
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('name', TextType::class);
    }
//Cette méthode configure les filtres, utilisés pour filtrer et trier la liste des modèles;
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('name');
    }
//Ici, vous spécifiez quels champs sont affichés lorsque tous
// les modèles sont listés (la addIdentifier()méthode signifie
// que ce champ sera lié à la page show / edit de ce modèle particulier).
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('name');
    }
}