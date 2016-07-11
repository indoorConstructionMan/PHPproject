<?php

class PHPProject_Set implements SeekableIterator, Countable, ArrayAccess {
    /**
     * The original data for each row.
     *
     * @var array
     */
    protected $_data = array();

    /**
     * Iterator pointer.
     *
     * @var integer
     */
    protected $_pointer = 0;

    /**
     * How many data rows there are.
     *
     * @var integer
     */
    protected $_count;

    /**
     * Constructor.
     *
     * @param array $params
     */
    public function __construct(array $params)
    {
        if (isset($params['data'])) {
            $this->_data = $params['data'];
        }

        // set the count of rows
        $this->_count = count($this->_data);

        $this->init();
    }

    /**
     * Store data, class names, and state in serialized object
     *
     * @return array
     */
    public function __sleep()
    {
        return array('_data', '_pointer', '_count');
    }

    /**
     * Setup to do on wakeup.
     *
     * @return void
     */
    public function __wakeup()
    {
    }

    /**
     * Initialize object
     *
     * Called from {__construct()} as final step of object instantiation.
     *
     * @return void
     */
    public function init()
    {
    }
	
    public function rewind()
    {
        $this->_pointer = 0;
        return $this;
    }

    public function current()
    {
        if ($this->valid() === false) {
            return null;
        }

        return $this->_data[$this->_pointer];
    }

    public function key()
    {
        return $this->_pointer;
    }

    public function next()
    {
        ++$this->_pointer;
		return $this;
    }

    public function valid()
    {
        return $this->_pointer < $this->_count;
    }

    public function count()
    {
        return $this->_count;
    }

    public function seek($position)
    {
        $position = (int) $position;
        if ($position < 0 || $position >= $this->_count) {
            require_once 'Spark/Set/Exception.php';
            throw new Spark_Set_Exception("Illegal index $position");
        }
        $this->_pointer = $position;
        return $this;
    }

    public function offsetExists($offset)
    {
        return isset($this->_data[(int) $offset]);
    }

    public function offsetGet($offset)
    {
        $this->_pointer = (int) $offset;

        return $this->current();
    }

    public function offsetSet($offset, $value)
    {
    }

    public function offsetUnset($offset)
    {
    }
    
    public function push(PHPProject_Object $object) 
    {
        $this->_data[] = $object;
        $this->_count = count($this->_data);
    }

    public function to_array()
    {
        return $this->_data;
    }
}

