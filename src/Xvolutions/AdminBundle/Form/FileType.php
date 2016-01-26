<?php

namespace Xvolutions\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FileType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                    'name',
                    'text',
                    array(
                        'label' => 'Nome do ficheiro'
                    )
            )
            ->add('fileName',
                    'file',
                    array(
                        'label' => 'Ficheiro',
                        'required' => true
                    )
            )
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Xvolutions\AdminBundle\Entity\File'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'xvolutions_adminbundle_file';
    }
}
