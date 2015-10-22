<?php

namespace Xvolutions\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
                        'choice_label' => 'language',
                        'multiple' => false,
                        'expanded' => false
                    )
            )
            ->add(
                    'id_section',
                    'entity',
                    array(
                        'class' => 'Xvolutions\AdminBundle\Entity\Section',
                        'choice_label' => 'section',
                        'multiple' => false,
                        'expanded' => false
                    )
            )
            ->add(
                    'id_status',
                    'entity',
                    array(
                        'class' => 'Xvolutions\AdminBundle\Entity\Status',
                        'choice_label' => 'status',
                        'multiple' => false,
                        'expanded' => false
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
