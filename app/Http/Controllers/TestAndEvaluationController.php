<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTestAndEvaluationRequest;
use App\Http\Requests\UpdateTestAndEvaluationRequest;
use App\Repositories\TestAndEvaluationRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class TestAndEvaluationController extends AppBaseController
{
    /** @var  TestAndEvaluationRepository */
    private $testAndEvaluationRepository;

    public function __construct(TestAndEvaluationRepository $testAndEvaluationRepo)
    {
        $this->testAndEvaluationRepository = $testAndEvaluationRepo;
    }

    /**
     * Display a listing of the TestAndEvaluation.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $testAndEvaluations = $this->testAndEvaluationRepository->all();

        return view('test_and_evaluations.index')
            ->with('testAndEvaluations', $testAndEvaluations);
    }

    /**
     * Show the form for creating a new TestAndEvaluation.
     *
     * @return Response
     */
    public function create()
    {
        return view('test_and_evaluations.create');
    }

    /**
     * Store a newly created TestAndEvaluation in storage.
     *
     * @param CreateTestAndEvaluationRequest $request
     *
     * @return Response
     */
    public function store(CreateTestAndEvaluationRequest $request)
    {
        $input = $request->all();

        $testAndEvaluation = $this->testAndEvaluationRepository->create($input);

        Flash::success('Test And Evaluation saved successfully.');

        return redirect(route('testAndEvaluations.index'));
    }

    /**
     * Display the specified TestAndEvaluation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $testAndEvaluation = $this->testAndEvaluationRepository->find($id);

        if (empty($testAndEvaluation)) {
            Flash::error('Test And Evaluation not found');

            return redirect(route('testAndEvaluations.index'));
        }

        return view('test_and_evaluations.show')->with('testAndEvaluation', $testAndEvaluation);
    }

    /**
     * Show the form for editing the specified TestAndEvaluation.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $testAndEvaluation = $this->testAndEvaluationRepository->find($id);

        if (empty($testAndEvaluation)) {
            Flash::error('Test And Evaluation not found');

            return redirect(route('testAndEvaluations.index'));
        }

        return view('test_and_evaluations.edit')->with('testAndEvaluation', $testAndEvaluation);
    }

    /**
     * Update the specified TestAndEvaluation in storage.
     *
     * @param int $id
     * @param UpdateTestAndEvaluationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTestAndEvaluationRequest $request)
    {
        $testAndEvaluation = $this->testAndEvaluationRepository->find($id);

        if (empty($testAndEvaluation)) {
            Flash::error('Test And Evaluation not found');

            return redirect(route('testAndEvaluations.index'));
        }

        $testAndEvaluation = $this->testAndEvaluationRepository->update($request->all(), $id);

        Flash::success('Test And Evaluation updated successfully.');

        return redirect(route('testAndEvaluations.index'));
    }

    /**
     * Remove the specified TestAndEvaluation from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $testAndEvaluation = $this->testAndEvaluationRepository->find($id);

        if (empty($testAndEvaluation)) {
            Flash::error('Test And Evaluation not found');

            return redirect(route('testAndEvaluations.index'));
        }

        $this->testAndEvaluationRepository->delete($id);

        Flash::success('Test And Evaluation deleted successfully.');

        return redirect(route('testAndEvaluations.index'));
    }
}
