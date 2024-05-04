<?php

namespace Konnec\VueEloquentApi\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait HasBatchActions
{
    public function batchStore(Request $request): JsonResponse
    {
        $result = [];
        foreach ($request->input('data') as $item) {

            if (isset($this->requests['store'])) {
                $validatedRequest = new $this->requests['store']($item);
            } else {
                $validatedRequest = new Request($item);
            }

            $res = $this->store($validatedRequest);
            $formatted = json_decode($res->getContent())->data;
            array_push($result, $formatted);
        }

        return response()->store($result);
    }

    public function batchUpdate(Request $request): JsonResponse
    {
        $result = [];
        foreach ($request->input('data') as $item) {

            if (isset($this->requests['update'])) {
                $validatedRequest = new $this->requests['update']($item);
            } else {
                $validatedRequest = new Request($item);
            }

            $res = $this->update(new Request($item), ($this->model)::find($item['id']));
            $formatted = json_decode($res->getContent())->data;
            array_push($result, $formatted);
        }

        return response()->update($result);
    }

    public function batchDestroy(Request $request): JsonResponse
    {
        $result = [];
        foreach ($request->input('data') as $item) {
            $res = $this->destroy(($this->model)::find($item['id']));
            $formatted = json_decode($res->getContent())->data;
            array_push($result, $formatted);
        }

        return response()->destroy($result);
    }
}
