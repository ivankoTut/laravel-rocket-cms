<?php
namespace Admin\CmsModels;

use AdminDisplay;
use AdminForm;
use AdminFormElement;
use SleepingOwl\Admin\Contracts\Form\FormInterface;
use SleepingOwl\Admin\Contracts\Display\DisplayInterface;
use SleepingOwl\Admin\Section;
use SleepingOwl\Admin\Contracts\Initializable;
/**
 * Class Posts
 *
 * @property \App\Models\CmsModels\TypePage $model
 *
 * @see http://sleepingowladmin.ru/docs/model_configuration_section
 */
class Page extends Section implements Initializable
{
    /**
     * @see http://sleepingowladmin.ru/docs/model_configuration#ограничение-прав-доступа
     *
     * @var bool
     */
    protected $checkAccess = false;
    /**
     * @var string
     */
    protected $title = '';
    /**
     * @var string
     */
    protected $alias;
    /**
     * Initialize class.
     */
    public function initialize()
    {
        $this->title = trans('cms.admin.nav.page');
    }
    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::tree()->setValue('title');
    }
    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('title', 'Title')->required(),
            AdminFormElement::select('type_page_id', trans('cms.admin.nav.type_page'), \App\Models\CmsModels\TypePage::class)->setDisplay('name'),
            AdminFormElement::text('slug', 'Slug')->required(),
            AdminFormElement::textarea('text', 'Text')
        ]);
    }
    /**
     * @return FormInterface
     */
    public function onCreate()
    {
        return $this->onEdit(null);
    }
}