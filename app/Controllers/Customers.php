<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    private CustomerModel $customers;

    public function __construct()
    {
        $this->customers = new CustomerModel();
    }

    public function index(): string
    {
        return view('customers/index', ['title' => 'Customers', 'activePage' => 'customers', 'customers' => $this->customers->orderBy('full_name', 'ASC')->findAll()]);
    }

    public function new(): string
    {
        return view('customers/form', ['title' => 'Add Customer', 'activePage' => 'customers', 'customer' => null, 'formAction' => site_url('customers/create'), 'formTitle' => 'Add Customer', 'submitLabel' => 'Create Customer']);
    }

    public function create()
    {
        if (! $this->validate(['full_name' => 'required|max_length[100]', 'email' => 'required|valid_email|max_length[100]'])) {
            return redirect()->back()->withInput();
        }
        $this->customers->insert(['full_name' => trim((string) $this->request->getPost('full_name')), 'email' => trim((string) $this->request->getPost('email')), 'created_at' => date('Y-m-d H:i:s')]);
        return redirect()->to(site_url('customers'))->with('success', 'Customer created successfully.');
    }

    public function edit(int $id): string
    {
        $customer = $this->customers->find($id);
        if ($customer === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Customer not found.');
        }
        return view('customers/form', ['title' => 'Edit Customer', 'activePage' => 'customers', 'customer' => $customer, 'formAction' => site_url('customers/update/' . $id), 'formTitle' => 'Edit Customer', 'submitLabel' => 'Save Changes']);
    }

    public function update(int $id)
    {
        if ($this->customers->find($id) === null) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Customer not found.');
        }
        if (! $this->validate(['full_name' => 'required|max_length[100]', 'email' => 'required|valid_email|max_length[100]'])) {
            return redirect()->back()->withInput();
        }
        $this->customers->update($id, ['full_name' => trim((string) $this->request->getPost('full_name')), 'email' => trim((string) $this->request->getPost('email'))]);
        return redirect()->to(site_url('customers'))->with('success', 'Customer updated successfully.');
    }
}
