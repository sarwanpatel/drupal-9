<?php
namespace Drupal\resume\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class MyModuleConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'my_module_config_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'my_module.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('my_module.settings');


      // $form['imagetitle'] = [
      // '#type' => 'textfield',
      // '#title' => $this->t('Title'),
      // '#description' => $this->t('image title'),
      // '#default_value' => $config->get('imagetitle'),
    
      // ],
    



    $form['my_module_image'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('My Module Image'),
      '#description' => $this->t('Upload an image for My Module.'),
      '#default_value' => $config->get('my_module_image'),
      '#upload_location' => 'public://my_module/',
      '#upload_validators' => [
        'file_validate_extensions' => ['gif png jpg jpeg'],
      ],
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('my_module.settings');

    // Save the image file ID.
    $config->set('my_module_image', $form_state->getValue('my_module_image'));
    // $config->set('my_module_image', $form_state->getValue('my_module_image')[0]);

    $config->save();

    parent::submitForm($form, $form_state);
  }

}
