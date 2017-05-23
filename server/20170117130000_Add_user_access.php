<?php
/**
 * Created by PhpStorm.
 * User: rkawatkar
 * Date: 17-Jan-17
 * Time: 1:01 PM
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Add_user_access extends CI_Migration {

    public function up()
    {
        $attributes = array('ENGINE' => 'InnoDB');
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'access' => array(
                'type' => 'VARCHAR',
                'constraint' => '100',
            ),
            'created' => array(
                'type' => 'TIMESTAMP'
            ),
        ));
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('access_master',TRUE,$attributes);

        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ),
            'user_id' => array(
                'type' => 'INT',
                'constraint' => 11
            ),
            'access_id' => array(
                'type' => 'INT',
                'constraint' => '11',
            ),
            'created' => array(
                'type' => 'TIMESTAMP'
            ),
        ));
        $this->dbforge->add_field('CONSTRAINT `fk_user_id` FOREIGN KEY (user_id) REFERENCES `user`(id)');
        $this->dbforge->add_field('CONSTRAINT `fk_access_id` FOREIGN KEY (access_id) REFERENCES `access_master`(id)');
        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('user_access',TRUE, $attributes);
    }

    public function down()
    {
        $this->dbforge->drop_table('access_master',TRUE);
        $this->dbforge->drop_table('user_access',TRUE);
    }
}