<?php
/**
 * User Model
 */
App::uses('AclManagementAppModel', 'AclManagement.Model');
class User extends AclManagementAppModel {
    public $name = 'User';
    public $useTable = "users";
    public $actsAs = array('Acl' => array('type' => 'requester'));
    public $validate = array(
//        'username' => array(
//            'alphanumeric' => array(
//                'rule' => 'alphaNumeric',
//                'message' => 'Only letters and numbers allowed.'
//            ),
//            'minlength' => array(
//                'rule' => array('minLength', '3'),
//                'message' => 'Minimum length of 3 characters.'
//            ),
//            'maxlength' => array(
//                'rule' => array('maxLength', '32'),
//                'message' => 'Maximum length of 32 characters.'
//            ),
//            'unique' => array(
//                'rule' => 'isUnique',
//                'message' => 'Username already in use.'
//            )
//        ),
        'name' => array(
            'required' => true,
            'allowEmpty' => false,
            'rule' => 'notEmpty',
            'message' => 'You must enter your real name.'
        ),
        'email' => array(
            'email' => array(
                'required' => true,
                'allowEmpty' => false,
                'rule' => 'email',
                'message' => 'Invalid email.',
                'last' => true
            ),
            'unique' => array(
                'required' => true,
                'allowEmpty' => false,
                'rule' => 'isUnique',
                'message' => 'Email already in use.'
            )
        ),
        'password' => array(
            'required' => false,
            'allowEmpty' => false,
            'rule' => 'comparePwd',
            'message' => 'Password mismatch or less than 6 characters.'
        )
    );
	
    function parentNode() {
        if (!$this->id && empty($this->data)) {
            return null;
        }
        if (isset($this->data['User']['group_id'])) {
            $groupId = $this->data['User']['group_id'];
        } else {
            $groupId = $this->field('group_id');
        }
        if (!$groupId) {
            return null;
        } else {
            return array('Group' => array('id' => $groupId));
        }
    }
    /**
     * Group-only ACL
     * This method will tell ACL to skip checking User Aro’s and to check only Group Aro’s.
     * Every user has to have assigned group_id for this to work.
     *
     * @param <type> $user
     * @return array
     */
    function bindNode($user) {
        return array('model' => 'Group', 'foreign_key' => $user['User']['group_id']);
    }

    public function beforeValidate($options = array()) {
        if (isset($this->data['User']['id'])) {
            $this->validate['password']['allowEmpty'] = true;
        }

        return true;
    }

    public function beforeSave($options = array()) {
        App::uses('Security', 'Utility');
        App::uses('String', 'Utility');

        if (empty($this->data['User']['password'])) { # empty password -> do not update
            unset($this->data['User']['password']);
        } else {
            $this->data['User']['password'] = Security::hash($this->data['User']['password'], null, true);
        }

        $this->data['User']['key'] = String::uuid();

        return true;
    }  

    public function comparePwd($check) {
        $check['password'] = trim($check['password']);

        if (!isset($this->data['User']['id']) && strlen($check['password']) < 6) {
            return false;
        }

        if (isset($this->data['User']['id']) && empty($check['password'])) {
            return true;
        }

        $r = ($check['password'] == $this->data['User']['password2'] && strlen($check['password']) >= 6);

        if (!$r) {
            $this->invalidate('password2', __d('user', 'Password missmatch.'));
        }

        return $r;
    }
}