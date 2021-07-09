<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class UserCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class UserCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     *
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\User::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/user');
        CRUD::setEntityNameStrings('user', 'users');

        // Show export to PDF, CSV, XLS and Print buttons on the table view. Please note it will only export the current _page_ of results. So in order to export all entries the user needs to make the current page show "All" entries from the top-left picker.
        $this->crud->enableExportButtons();


        // add a "simple" filter called Verified
        $this->crud->addFilter([
            'type' => 'simple',
            'name' => 'verified',
            'label'=> 'Verified'
        ],
        false, // the simple filter has no values, just the "Draft" label specified above
        function() { // if the filter is active (the GET parameter "draft" exits)
            $this->crud->addClause('where', 'email_verified_at', '!=', NULL);
            // we've added a clause to the CRUD so that only elements with draft=1 are shown in the table
            // an alternative syntax to this would have been
            // $this->crud->query = $this->crud->query->where('draft', '1');
            // another alternative syntax, in case you had a scopeDraft() on your model:
            // $this->crud->addClause('draft');
        });

        $this->crud->addFilter([
            'type' => 'simple',
            'name' => 'plenty_coins',
            'label'=> 'Plenty Coins'
        ],
        false, // the simple filter has no values, just the "Draft" label specified above
        function() { // if the filter is active (the GET parameter "draft" exits)
            $this->crud->addClause('where', 'coin_balance', '>', 648);
            // we've added a clause to the CRUD so that only elements with draft=1 are shown in the table
            // an alternative syntax to this would have been
            // $this->crud->query = $this->crud->query->where('draft', '1');
            // another alternative syntax, in case you had a scopeDraft() on your model:
            // $this->crud->addClause('draft');
        });
    }

    /**
     * Define what happens when the List operation is loaded.
     *
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        // CRUD::setFromDb(); // columns
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']);
         */

        CRUD::column('first_name');
        CRUD::column('last_name');
        CRUD::column('email');
        CRUD::column('username');
        CRUD::column('coin_balance');
        CRUD::column('refferal_revenue');
        CRUD::column('subscribed_to_news_letter');
        CRUD::column('total_entry')->type('number');
        CRUD::column('last_login');
    }

    /**
     * Define what happens when the Create operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(UserRequest::class);

        CRUD::setFromDb(); // fields

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number']));
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
