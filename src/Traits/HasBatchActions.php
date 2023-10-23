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
            $res = $this->store(new Request($item));
            $formatted = json_decode($res->getContent())->data;
            array_push($result, $formatted);
        }

        return response()->store($result);
    }

    public function batchUpdate(Request $request): JsonResponse
    {
        $result = [];
        foreach ($request->input('data') as $item) {
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
