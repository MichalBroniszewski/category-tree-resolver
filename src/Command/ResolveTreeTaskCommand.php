<?php
/**
 * user: michal
 * michal.broniszewski@picodi.com
 * 22.10.2020
 */

namespace App\Command;

use App\Exception\TranslationNotExistsException;
use App\TreeResolver;
use JsonException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use App\DataProvider\FileDataProvider;

class ResolveTreeTaskCommand extends Command
{
    private const TRANSLATIONS = [
        'pl_PL',
        'en_US'
    ];

    private FileDataProvider $fileDataProvider;

    private TreeResolver $treeResolver;

    public function __construct()
    {
        parent::__construct();
        $this->fileDataProvider = new FileDataProvider();
        $this->treeResolver = new TreeResolver();
    }

    /**
     * @return void
     */
    protected function configure(): void
    {
        parent::configure();
        $this->setName('resolve-tree-task')
            ->setDescription('Resolve tree task.')
            ->setDefinition([
                new InputOption(
                    'translation',
                    't',
                    InputOption::VALUE_OPTIONAL,
                    "Choose translation (pl_PL/en_US)",
                    'pl_PL'
                ),
            ]);
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     * @throws JsonException
     * @throws TranslationNotExistsException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $translationKey = $input->getOption('translation');
        $this->validateTranslation($translationKey);
        $list = $this->fileDataProvider->getList();
        $tree = $this->fileDataProvider->getTree();
        $result = $this->treeResolver->assignName($tree, $list, $translationKey);
        print_r($result);
        return 0;
    }

    /**
     * @param string $translationKey
     * @return void
     * @throws TranslationNotExistsException
     */
    private function validateTranslation(string $translationKey): void
    {
        if (!in_array($translationKey,self::TRANSLATIONS)) {
            throw new TranslationNotExistsException(
                sprintf('Given translation "%s" does not exists', $translationKey)
            );
        }
    }
}
