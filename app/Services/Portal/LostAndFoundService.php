<?php

namespace CentralCondo\Services\Portal;

use CentralCondo\Repositories\Portal\LastAndFoundGroupRepository;
use CentralCondo\Repositories\Portal\LastAndFoundRepository;
use CentralCondo\Validators\Portal\LastAndFoundValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Prettus\Validator\Contracts\ValidatorInterface;

class LastAndFoundService //regras de negocios
{

    /**
     * @var LastAndFoundRepository
     */
    protected $repository;

    /**
     * @var LastAndFoundValidator
     */
    protected $validator;

    /**
     * @var LastAndFoundGroupRepository
     */
    protected $LastAndFoundGroupRepository;

    /**
     * LastAndFoundService constructor.
     * @param LastAndFoundRepository $repository
     * @param LastAndFoundValidator $validator
     * @param LastAndFoundGroupRepository $LastAndFoundGroupRepository
     */
    public function __construct(LastAndFoundRepository $repository,
                                LastAndFoundValidator $validator,
                                LastAndFoundGroupRepository $LastAndFoundGroupRepository)
    {
        $this->repository = $repository;
        $this->validator = $validator;
        $this->LastAndFoundGroupRepository = $LastAndFoundGroupRepository;
    }

    public function create(array $data)
    {

        try {
            $data['date_display'] = date('Y-m-d', strtotime($data['date_display']));

            $this->validator->with($data)->passesOrFail();
            $dados = $this->repository->create($data);
            if ($dados) {

                //commnunication group
                if ($data['all_user'] == 'n') {
                    if (count($data['group']) > 0) {
                        foreach ($data['group'] as $row) {

                            $commnucationGroup['LastAndFound_id'] = $dados['id'];
                            $commnucationGroup['group_condominium_id'] = $row;

                            $this->LastAndFoundGroupRepository->create($commnucationGroup);

                        }
                    }
                }

                $response = [
                    'message' => 'UsersRole add.',
                    'data' => $dados->toArray(),
                ];

                return redirect()->back()->with('message', $response['message']);
            }
        } catch (ValidatorException $e) {
            $response = [
                'error' => true,
                'message' => $e->getMessageBag()
            ];


            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    public function update(array $data, $id)
    {
        try {
            $data['date_display'] = date('Y-m-d', strtotime($data['date_display']));

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            $dados = $this->repository->update($data, $id);

            if ($dados) {
                $response = [
                    'message' => 'UsersRole updated.',
                    'data' => $dados->toArray(),
                ];

                return redirect()->back()->with('message', $response['message']);
            }
        } catch (ValidatorException $e) {

            $response = response()->json([
                'error' => true,
                'message' => $e->getMessageBag()
            ]);

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

}