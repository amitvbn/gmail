<?php

class Receivers extends \Phalcon\Mvc\Model
{
    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="integer", length=10, nullable=false)
     */
    public $id;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    public $mail_id;

    /**
     *
     * @var string
     * @Column(type="string", length=70, nullable=true)
     */
    public $to;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $trash;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $read;

    /**
     *
     * @var string
     * @Column(type="string", length=70, nullable=true)
     */
    public $timestamp;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("db_gmail");
        $this->belongsTo(
            "mail_id",
            "Mails",
            "id"
        );        
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'receivers';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Receivers[]|Receivers
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Receivers
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
