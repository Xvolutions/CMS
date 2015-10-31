<?php

namespace Xvolutions\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BlogPostType extends AbstractType
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
                        'label' => 'Título',
                        'attr' => array('class' => 'title')
                    ))
            ->add(
                    'subtitle',
                    null,
                    array(
                        'label' => 'Sub-Título',
                        'attr' => array('class' => 'title')
                    ))
            ->add(
                    'author',
                    null,
                    array(
                        'label' => 'Autor'
                    ))
            ->add(
                    'text',
                    null,
                    array(
                        'label' => 'Texto'
                    ))
            ->add(
                    'date',
                    null,
                    array(
                        'label' => 'Data',
                        'data' => new \DateTime('now')
                    ))
            ->add(
                    'tag',
                    null,
                    array(
                        'label' => 'Tag'
                    )
            )
            ->add(
                    'category',
                    null,
                    array(
                        'label' => 'Categoria'
                    )
            )
            ->add(
                    'id_section',
                    'entity',
                    array(
                        'class' => 'Xvolutions\AdminBundle\Entity\Section',
                        'choice_label' => 'section',
                        'multiple' => false,
                        'expanded' => false,
                        'label' => 'Section'
                    )
            )
            ->add(
                    'id_language',
                    'entity',
                    array(
                        'class' => 'Xvolutions\AdminBundle\Entity\Language',
                        'choice_label' => 'language',
                        'multiple' => false,
                        'expanded' => false,
                        'label' => 'Language'
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
            'data_class' => 'Xvolutions\AdminBundle\Entity\BlogPost'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'xvolutions_adminbundle_blogpost';
    }
}
