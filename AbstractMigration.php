<?php

/**
 * Abstract class for individual migrations to extend from.
 *
 * @author Andrey F. Mindubaev <covex.mobile@gmail.com>
 * @license http://opensource.org/licenses/MIT  MIT License
 */
namespace Doctrine\Bundle\MigrationsBundle;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Doctrine\DBAL\Migrations\AbstractMigration as Doctrine_AbstractMigration;
use Doctrine\Bundle\DoctrineBundle\Registry;
use Doctrine\DBAL\Schema\Schema;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Abstract class for individual migrations to extend from.
 */
abstract class AbstractMigration extends Doctrine_AbstractMigration
  implements ContainerAwareInterface
{

  /**
   * Execute migration
   *
   * @param Schema $schema Schema
   *
   * @return null
   */
  public function up(Schema $schema)
  {

  }

  /**
   * Rollback migration
   *
   * @param Schema $schema Schema
   *
   * @return null
   */
  public function down(Schema $schema)
  {

  }

  /**
   * @var ContainerInterface
   */
  private $_container;

  /**
   * Set container
   *
   * @param ContainerInterface $container Container
   *
   * @return null
   */
  public function setContainer(ContainerInterface $container = null)
  {
    $this->_container = $container;
  }

  /**
   * Get container
   *
   * @return ContainerInterface
   */
  public function getContainer()
  {
    return $this->_container;
  }

  /**
   * Get doctrine registry
   *
   * @return Registry
   */
  public function getDoctrine()
  {
    $doctrine = $this->getContainer()->get("doctrine");
    /* @var $doctrine Registry */
    return $doctrine;
  }

  /**
   * Return entity manager
   *
   * @param string $name Repository name
   *
   * @return ObjectManager
   */
  public function getManager($name = null)
  {
    return $this->getDoctrine()->getManager($name);
  }

}
