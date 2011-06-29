<?php

/**
 * Comment form.
 *
 * @package    shimano
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class registerBlogForm extends ClientForm {

    public function configure() {
        $this->disableLocalCSRFProtection();
        unset(
                $this['user_id'], $this['user_type']
        );
        $this->setDefault('user_type','Blog');
        $this->widgetSchema['password'] = new sfWidgetFormInputPassword();
        $this->widgetSchema['password_again'] = new sfWidgetFormInputPassword();
        $this->widgetSchema->setLabels(array(
            'password_again' => 'Repetir Contraseña',
            'password' => 'Contraseña',
        ));
        $this->validatorSchema['password'] = new sfValidatorAnd(array(
                    new sfValidatorString(
                            array('min_length' => 4, 'max_length' => 15),
                            array('min_length' => 'Your password must have at least 4 characters.', 'max_length' => 'Your password cannot be longer than 15 characters.')
                    ),
                    new sfValidatorRegex(
                            array('pattern' => '/^[A-Za-z0-9]*$/i'),
                            array('invalid' => 'Your password can only have letters lowercase (a-z) or letters uppercase (A-Z) or numbers (0-9).')
                    ),
                        ), array('required' => false), array('required' => 'Please enter a password.'));

        $this->validatorSchema['password_again'] = clone $this->validatorSchema['password'];

        $this->widgetSchema->moveField('password_again', 'after', 'password');
        $this->mergePostValidator(new sfValidatorSchemaCompare('password', sfValidatorSchemaCompare::EQUAL, 'password_again', array(), array('invalid' => 'The two passwords must be the same.')));

        $this->widgetSchema->setHelps(array(
            'password' => 'Mínimo 4 caracteres'
        ));
    }

    public function save($conn = null) {

        $conn = Doctrine_Manager::connection();
        $conn->transaction->setIsolation('SERIALIZABLE');
        $conn->beginTransaction();
        try {

            $cliente = parent::save($conn);

            $user = new sfGuardUser();

            $user->first_name = $this->getValue('first_name');
            $user->last_name = $this->getValue('last_name');
            $user->email_address = $this->getValue('email_address');
            $user->username = $this->getValue('username');
            $user->password = $this->getValue('password');
            $user->is_active = 0;

            $user->save($conn);

            $cli = Doctrine::getTable('Client')->find($cliente->id);
            $cli->user_id = $user->id;
            $cli->save($conn);

            $usuariopermiso = new sfGuardUserPermission();
            $usuariopermiso->user_id = $user->id;
            $permiso = 'Cliente';
            $u = Doctrine::getTable('sfGuardPermission')->findOneByName($permiso);
            $usuariopermiso->permission_id = $u->id;

            $usuariopermiso->save($conn);


            $conn->commit();

            return $user;
        } catch (Doctrine_Exception $e) {
            $conn->rollback();
            return null;
        }
    }

}
