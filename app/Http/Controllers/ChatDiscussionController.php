<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateChatDiscussionRequest;
use App\Http\Requests\UpdateChatDiscussionRequest;
use App\Repositories\ChatDiscussionRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class ChatDiscussionController extends AppBaseController
{
    /** @var  ChatDiscussionRepository */
    private $chatDiscussionRepository;

    public function __construct(ChatDiscussionRepository $chatDiscussionRepo)
    {
        $this->chatDiscussionRepository = $chatDiscussionRepo;
    }

    /**
     * Display a listing of the ChatDiscussion.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $chatDiscussions = $this->chatDiscussionRepository->all();

        return view('chat_discussions.index')
            ->with('chatDiscussions', $chatDiscussions);
    }

    /**
     * Show the form for creating a new ChatDiscussion.
     *
     * @return Response
     */
    public function create()
    {
        return view('chat_discussions.create');
    }

    /**
     * Store a newly created ChatDiscussion in storage.
     *
     * @param CreateChatDiscussionRequest $request
     *
     * @return Response
     */
    public function store(CreateChatDiscussionRequest $request)
    {
        $input = $request->all();

        $chatDiscussion = $this->chatDiscussionRepository->create($input);

        Flash::success('Chat Discussion saved successfully.');

        return redirect(route('chatDiscussions.index'));
    }

    /**
     * Display the specified ChatDiscussion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $chatDiscussion = $this->chatDiscussionRepository->find($id);

        if (empty($chatDiscussion)) {
            Flash::error('Chat Discussion not found');

            return redirect(route('chatDiscussions.index'));
        }

        return view('chat_discussions.show')->with('chatDiscussion', $chatDiscussion);
    }

    /**
     * Show the form for editing the specified ChatDiscussion.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $chatDiscussion = $this->chatDiscussionRepository->find($id);

        if (empty($chatDiscussion)) {
            Flash::error('Chat Discussion not found');

            return redirect(route('chatDiscussions.index'));
        }

        return view('chat_discussions.edit')->with('chatDiscussion', $chatDiscussion);
    }

    /**
     * Update the specified ChatDiscussion in storage.
     *
     * @param int $id
     * @param UpdateChatDiscussionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateChatDiscussionRequest $request)
    {
        $chatDiscussion = $this->chatDiscussionRepository->find($id);

        if (empty($chatDiscussion)) {
            Flash::error('Chat Discussion not found');

            return redirect(route('chatDiscussions.index'));
        }

        $chatDiscussion = $this->chatDiscussionRepository->update($request->all(), $id);

        Flash::success('Chat Discussion updated successfully.');

        return redirect(route('chatDiscussions.index'));
    }

    /**
     * Remove the specified ChatDiscussion from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $chatDiscussion = $this->chatDiscussionRepository->find($id);

        if (empty($chatDiscussion)) {
            Flash::error('Chat Discussion not found');

            return redirect(route('chatDiscussions.index'));
        }

        $this->chatDiscussionRepository->delete($id);

        Flash::success('Chat Discussion deleted successfully.');

        return redirect(route('chatDiscussions.index'));
    }
}
