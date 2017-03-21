<?php

class Mails extends \Phalcon\Mvc\Model
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
     * @var string
     * @Column(type="string", length=70, nullable=false)
     */
    public $sender;

    /**
     *
     * @var string
     * @Column(type="string", length=70, nullable=true)
     */
    public $subject;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $body;

    /**
     *
     * @var integer
     * @Column(type="integer", length=10, nullable=false)
     */
    public $conversation_id;

    /**
     *
     * @var string
     * @Column(type="string", nullable=true)
     */
    public $timestamp;

    /**
     *
     * @var string
     * @Column(type="string", length=70, nullable=true)
     */
    public $attachment_ids;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $draft;

    /**
     *
     * @var integer
     * @Column(type="integer", length=1, nullable=true)
     */
    public $sent_trash;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("db_gmail");
        $this->hasMany(
            "id",
            "Receivers",
            "mail_id"
        );
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'mails';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Mails[]|Mails
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Mails
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
