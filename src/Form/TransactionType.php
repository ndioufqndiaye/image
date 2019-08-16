<?php

namespace App\Form;

use App\Entity\Tarifs;
use App\Entity\Transaction;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TransactionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('agence')
            ->add('montant')
            #->add('datetransaction')
            #->add('code')
            ->add('expediteur')
            ->add('beneficiaire')
            ->add('user')
            ->add('useretrait')

           /* ->add('frais',EntityType::class, [
                'class' => Tarifs::class,
                'choice_label' => 'frais_id']
            );*/
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Transaction::class,
        ]);
    }
}
