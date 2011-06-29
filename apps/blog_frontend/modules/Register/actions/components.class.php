<?php


class RegisterComponents extends sfComponents
{
  public function executeForm()
  {
    $this->form = new registerForm();
  }
}