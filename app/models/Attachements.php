<?php

class Attachements extends \Phalcon\Mvc\Model
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
     * @Column(type="string", length=70, nullable=true)
     */
    public $name;

    /**
     *
     * @var string
     * @Column(type="string", length=70, nullable=true)
     */
    public $path;

    /**
     *
     * @var integer
     * @Column(type="integer", length=70, nullable=true)
     */
    public $size;

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
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'attachements';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Attachements[]|Attachements
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Attachements
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

}
