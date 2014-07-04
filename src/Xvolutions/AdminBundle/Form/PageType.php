<?php

namespace Xvolutions\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PageType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                    'title',
                    null,
                    array(
                        'attr' => array('class' => 'title')
                    ))
            ->add('text')
            ->add(
                    'id_language', 
                    'entity', 
                    array(
                        'class' => 'Xvolutions\AdminBundle\Entity\Language',
                        'property' => 'language',
                        'multiple' => false,
                        'expanded' => false
                    )
            )
            ->add(
                    'id_section', 
                    'entity', 
                    array(
                        'class' => 'Xvolutions\AdminBundle\Entity\Section',
                        'property' => 'section',
                        'multiple' => false,
                        'expanded' => false
                    )
            )
            ->add(
                    'id_parent', 
                    'entity', 
                    array(
                        'class' => 'Xvolutions\AdminBundle\Entity\Page',
                        'property' => 'title',
                        'multiple' => false,
                        'expanded' => false
                    )
            )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Xvolutions\AdminBundle\Entity\Page'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'xvolutions_adminbundle_page';
    }
}
