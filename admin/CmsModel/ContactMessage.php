<?php
namespace Admin\CmsModels;

use AdminDisplay;
use AdminForm;
use AdminColumn;
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
class ContactMessage extends Section implements Initializable
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
        $this->title = trans('cms.admin.nav.contact_message');
    }
    /**
     * @return DisplayInterface
     */
    public function onDisplay()
    {
        return AdminDisplay::table()->setColumns([
            AdminColumn::link('name', 'Name'),
            AdminColumn::text('email', 'Email'),
            AdminColumn::text('phone', 'Phone'),
        ])->paginate(15);
    }
    /**
     * @param int $id
     *
     * @return FormInterface
     */
    public function onEdit($id)
    {
        return AdminForm::panel()->addBody([
            AdminFormElement::text('name', 'Name')->required(),
            AdminFormElement::text('email', 'Email'),
            AdminFormElement::text('phone', 'Phone'),
            AdminFormElement::textarea('content', 'Content')->required(),
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