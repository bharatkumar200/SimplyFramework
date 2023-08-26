<?php

namespace Core\Service\Markdown;

use League\CommonMark\Exception\CommonMarkException;
use SimplyDi\SimplyMarkdown\MdParser;

class ContentFetcher
{

    private MdParser $content;

    public function __construct()
    {
        $this->content = new MdParser(ROOT_PATH . setting("markdown.path"));
    }

    /**
     * @throws CommonMarkException
     */
    public function get(string $slug): ?array
    {
        return $this->content->getFileContent($slug);
    }

    /**
     * @throws CommonMarkException
     */
    public function getAll($folder): ?array
    {
        return $this->content->getFolderFiles($folder);
    }

}