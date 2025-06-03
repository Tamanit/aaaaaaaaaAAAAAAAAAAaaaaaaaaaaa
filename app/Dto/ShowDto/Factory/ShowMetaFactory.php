<?php

namespace App\Dto\ShowDto\Factory;



use App\Dto\ShowDto\ShowMeta;

class ShowMetaFactory
{
    public function __construct(
        protected ShowMetaBlockFactory $showMetaBlockFactory
    ) {
    }

    public function make(array $data): ShowMeta
    {
        return new ShowMeta(
            $data['page'],
            $this->showMetaBlockFactory->makeCollection($data['blocks'])
        );
    }
}
