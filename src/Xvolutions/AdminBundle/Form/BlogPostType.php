<?php

namespace Xvolutions\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogPostType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('author')
            ->add('text')
            ->add('date')
            ->add('tags')
            ->add(
                    'tags', 
                    'entity', 
                    array(
                        'class' => 'Xvolutions\AdminBundle\Entity\Tags',
                        'property' => 'tag',
                        'multiple' => true,
                        'expanded' => false
                    )
            )
            ->add(
                    'categories', 
                    'entity', 
                    array(
                        'class' => 'Xvolutions\AdminBundle\Entity\Categories',
                        'property' => 'category',
                        'multiple' => true,
                        'expanded' => false
                    )
            )
            ->add(
                    'section', 
                    'entity', 
                    array(
                        'class' => 'Xvolutions\AdminBundle\Entity\Section',
                        'property' => 'section',
                        'multiple' => false,
                        'expanded' => false
                    )
            )
            ->add(
                    'language', 
                    'entity', 
                    array(
                        'class' => 'Xvolutions\AdminBundle\Entity\Language',
                        'property' => 'language',
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
