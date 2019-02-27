<?php
/**
 * Created by marcosamano.
 * Date: 24/03/18
 */
namespace Ast\WebfastBundle\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
// Add the Container
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

class CreateEntitysCommand extends  ContainerAwareCommand
{
    protected static $defaultName = 'webfast:create:entitys';

    protected function configure()
    {
        $this
            ->setName(static::$defaultName)
            ->setDescription('Crear entidades Base.')
            ->addOption('folder_entitys',null,InputOption::VALUE_REQUIRED,'Folder Entitys','default')
            ->addOption('entitys_namespace',null,InputOption::VALUE_REQUIRED,'Namespace Entidades (1,0)','default')
            ->addOption('prefix_tables',null,InputOption::VALUE_REQUIRED,'Namespace Entidades (1,0)','default')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // outputs multiple lines to the console (adding "\n" at the end of each line)
        $tiempo_inicio = microtime(true);
        $folder = '';
        $namespace = '';
        if(\Symfony\Component\HttpKernel\Kernel::MAJOR_VERSION == 4){
            $folder_entitys = ($input->getOption('folder_entitys') == 'default')?'Entity':$input->getOption('folder_entitys');
            $folder = $this->getContainer()->getParameter("kernel.project_dir").'/src/'.$folder_entitys;
            $namespace = ($input->getOption('entitys_namespace') == 'default')?'App\Entity':$input->getOption('entitys_namespace');
        }else{
            $folder_entitys = ($input->getOption('folder_entitys') == 'default')?'AppBundle/Entity':$input->getOption('folder_entitys');
            $folder = $this->getContainer()->getParameter("kernel.project_dir").'/src/'.$folder_entitys;
            $namespace = ($input->getOption('entitys_namespace') == 'default')?'AppBundle\Entity':$input->getOption('entitys_namespace');
        }
        $prefixtables = ($input->getOption('prefix_tables') == 'default')?'Site_':$input->getOption('prefix_tables');

        $output->writeln([
            'Create Entitys Site  ',// A line
            '========================================',// Another line
            '',// Empty line
        ]);


        $output->writeln('Namespace: '.$namespace);
        $output->writeln('Dir: '.$folder);
        $output->writeln('');
        $output->writeln('Prefix Tables: '.$prefixtables);
        $output->writeln('');

        $entidades = $this->exportar($prefixtables,$folder,$namespace);
        $output->writeln('Resultado:'.$entidades .' entidades');


        // outputs a message without adding a "\n" at the end of the line
        $output->writeln(['','Comando Terminado, '.$this->timecommand($tiempo_inicio).' :)']);
    }

    private function timecommand($tiempo_inicio){
        $tiempo_fin = microtime(true);
        $seconds = round($tiempo_fin - $tiempo_inicio, 0);
        $hours = floor($seconds / 3600);
        $mins = floor($seconds / 60 % 60);
        $secs = floor($seconds % 60);
        if($secs == 0){
            $secs = round($tiempo_fin - $tiempo_inicio, 3);
        }

        return ($hours>0? $hours.'h ':'').($mins>0? $mins.'m ':''). $secs.'s';
    }

    private function exportar($prefixtables,$folder,$namespace){
        if(\Symfony\Component\HttpKernel\Kernel::MAJOR_VERSION == 4){
            $dir = __DIR__.'/../extras/sf4/';
            $findnamespace = 'App\Entity';
        }else{
            $dir = __DIR__.'/../extras/sf3/';
            $findnamespace = 'AppBundle\Entity';
        }
        $files = [
            'Administrador',
            'Configuracion',
            'Contacto',
            'Galeria',
            'GaleriaImagen',
            'Imagen',
            'Lista',
            'ListaContenido',
            'Pagina',
            'Parrafo',
            'Portafolio',
            'Producto',
            'Tab',
        ];
        if(!file_exists($folder)){
            mkdir($folder,0777, true);
        }
        foreach ($files as $file){
            $txt = file_get_contents($dir.$file);
            $txt = str_replace('Table(name="','Table(name="'.$prefixtables,$txt);
            $txt = str_replace($findnamespace,$namespace,$txt);
            $filename = $folder.'/'.$file.'.php';
            file_put_contents($filename,$txt);
        }
        return count($files);

    }
}