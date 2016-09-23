<?php

namespace CentralCondo\Http\Controllers\Portal;

use Illuminate\Http\Request;

use CentralCondo\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use CentralCondo\Http\Requests\UsersCondominiumCreateRequest;
use CentralCondo\Http\Requests\UsersCondominiumUpdateRequest;
use CentralCondo\Repositories\Portal\UsersCondominiumRepository;
use CentralCondo\Validators\Portal\UsersCondominiumValidator;


class UsersCondominiumController extends Controller
{

    /**
     * @var UsersCondominiumRepository
     */
    protected $repository;

    /**
     * @var UsersCondominiumValidator
     */
    protected $validator;

    public function __construct(UsersCondominiumRepository $repository, UsersCondominiumValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $usersCondominia = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $usersCondominia,
            ]);
        }

        return view('usersCondominia.index', compact('usersCondominia'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  UsersCondominiumCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UsersCondominiumCreateRequest $request)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $usersCondominium = $this->repository->create($request->all());

            $response = [
                'message' => 'UsersCondominium created.',
                'data'    => $usersCondominium->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usersCondominium = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $usersCondominium,
            ]);
        }

        return view('usersCondominia.show', compact('usersCondominium'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $usersCondominium = $this->repository->find($id);

        return view('usersCondominia.edit', compact('usersCondominium'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  UsersCondominiumUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     */
    public function update(UsersCondominiumUpdateRequest $request, $id)
    {

        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $usersCondominium = $this->repository->update($id, $request->all());

            $response = [
                'message' => 'UsersCondominium updated.',
                'data'    => $usersCondominium->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'UsersCondominium deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'UsersCondominium deleted.');
    }
}
