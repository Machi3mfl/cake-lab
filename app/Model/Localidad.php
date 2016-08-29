<?php
App::uses('AppModel', 'Model');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Localidad
 *
 * @author Maximiliano
 */
class Localidad extends AppModel {

    public $name = 'Localidad';
    var $primaryKey='cod_loc';
    var $useTable='localidades';
    var $displayField='nom_loc';


    public function getLocalidades( $prov ){
      return $this->query('SELECT * FROM localidades;');
    }
}
