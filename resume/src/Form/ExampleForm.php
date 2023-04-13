<?php

namespace Drupal\resume\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Configure example settings for this site.
 */
class ExampleForm extends ConfigFormBase {

  /** 
   * Config settings.
   *
   * @var string
   */
  const SETTINGS = 'ExampleForm.settings';

  /** 
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'ExampleForm';
  }

  /** 
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      static::SETTINGS,
    ];
  }

  /** 
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config(static::SETTINGS);


    $form['my_file'] = [
      '#type' => 'managed_file',
      '#title' => 'Your Pick:',
      '#name' => 'my_custom_file',
      '#description' => $this->t('Plese Upload image'),
      '#default_value' => $config->get('my_file'),
      '#upload_location' => 'public://'
    ];

    $form['name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Name:'),
      '#description' => $this->t('Plese Enter Your Full Name '),
      '#default_value' => $config->get('name'),
    ];  

$form['email'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Email ID:'),
      '#description' => $this->t('Plese Enter Your Email ID '),
      '#default_value' => $config->get('email'),

    ];  $form['mobile'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Phone Number:'),
       '#description' => $this->t('Plese Enter Your Phone Number '),
      '#default_value' => $config->get('mobile'),
    ];  


    $form['address'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Address:'),
       '#description' => $this->t('Plese Enter Your Full Address '),
      '#default_value' => $config->get('address'),
    ];  



    return parent::buildForm($form, $form_state);
  }

  /** 
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Retrieve the configuration.


    //  if(isset($form_state['default_press_release_image'])) {
    //   // Set file status to permanent.
    //   $image = $form_state->getValue('my_file');
    //   $file = File::load($image[0]);
    //   $file->setPermanent();
    //   $file->save();
    //   // Add to file usage calculation.
    //   \Drupal::service('file.usage')->add;
    // }


    $this->config(static::SETTINGS)


    //    if(isset($form_state['default_press_release_image'])) {
    //   // Set file status to permanent.
    //   $image = $form_state->getValue('my_file');
    //   $file = File::load($image[0]);
    //   $file->setPermanent();
    //   $file->save();
    //   // Add to file usage calculation.
    //   \Drupal::service('file.usage')->add;
    // }


     // ->set('default_press_release_image', $form_state->getValue('default_press_release_image'))
    
      ->set('name', $form_state->getValue('name'))
     
      ->set('email', $form_state->getValue('email'))
      ->set('mobile', $form_state->getValue('mobile'))
      ->set('address', $form_state->getValue('address'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
