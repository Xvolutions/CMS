<?php

namespace Xvolutions\AdminBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')
            ->add('name')
            ->add(
                    'password', 
                    'repeated', 
                    array(
                        'first_name' => 'password',
                        'second_name' => 'confirm',
                        'type' => 'password',
                        'required' => false
                    )
            )
            ->add('email')
            ->add('isactive')
            ->add(
                    'roles', 
                    'entity', 
                    array(
                        'class' => 'Xvolutions\AdminBundle\Entity\Role',
                        'property' => 'name',
                        'multiple' => true,
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
            'data_class' => 'Xvolutions\AdminBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'xvolutions_adminbundle_user';
    }
}
