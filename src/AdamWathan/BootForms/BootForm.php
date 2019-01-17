<?php namespace AdamWathan\BootForms;

class BootForm
{
    private $builder;
    private $basicFormBuilder;
    private $horizontalFormBuilder;

    protected $fields;

    protected $model;

    public function __construct(BasicFormBuilder $basicFormBuilder, HorizontalFormBuilder $horizontalFormBuilder)
    {
        $this->basicFormBuilder = $basicFormBuilder;
        $this->horizontalFormBuilder = $horizontalFormBuilder;
    }

    public function open()
    {
        $this->builder = $this->basicFormBuilder;
        return $this->builder->open();
    }

    public function openHorizontal($columnSizes)
    {
        $this->horizontalFormBuilder->setColumnSizes($columnSizes);
        $this->builder = $this->horizontalFormBuilder;
        return $this->builder->open();
    }

    public function __call($method, $parameters)
    {
        if($method === 'bind') {
            if(count($parameters)) {
                $this->model = $parameters[0];
            }
        }

        return call_user_func_array([$this->builder, $method], $parameters);
    }
}
