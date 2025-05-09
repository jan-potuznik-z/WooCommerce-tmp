<?php
/**
 * Main Packeta plugin class.
 *
 * @package Packetery
 */

declare( strict_types=1 );

namespace Packetery\Module;

use Packetery\Module\Carrier\EntityRepository;
use Packetery\Module\Commands\DemoOrderCommand;
use Packetery\Module\Dashboard\DashboardPage;
use Packetery\Module\Hooks\HookRegistrar;
use Packetery\Module\Options\OptionsProvider;
use Packetery\Module\Order\Builder;
use Packetery\Module\Order\Repository;
use WP_CLI;

/**
 * Class Plugin
 *
 * @package Packetery
 */
class Plugin {

	public const VERSION                = '2.0.4';
	public const DOMAIN                 = 'packeta';
	public const PARAM_PACKETERY_ACTION = 'packetery_action';
	public const PARAM_NONCE            = '_wpnonce';

	/**
	 * @var HookRegistrar
	 */
	private $hookRegistrar;

	/**
	 * @var Builder
	 */
	private $builder;

	/**
	 * @var Repository
	 */
	private $orderRepository;

	/**
	 * @var EntityRepository
	 */
	private $carrierRepository;

	/**
	 * @var OptionsProvider
	 */
	private $optionsProvider;

	public function __construct( HookRegistrar $hookRegistrar, Builder $builder, Repository $orderRepository, EntityRepository $carrierRepository, OptionsProvider $optionsProvider ) {
		$this->hookRegistrar     = $hookRegistrar;
		$this->builder           = $builder;
		$this->orderRepository   = $orderRepository;
		$this->carrierRepository = $carrierRepository;
		$this->optionsProvider   = $optionsProvider;
	}

	/**
	 * Gets list of multisite sites.
	 *
	 * @return array
	 */
	public static function getSites(): array {
		return get_sites(
			[
				'fields'            => 'ids',
				'number'            => 0,
				'update_site_cache' => false,
			]
		);
	}

	/**
	 * Method to register hooks
	 */
	public function run(): void {
		if ( defined( 'WP_CLI' ) && WP_CLI ) {
			$instance = DemoOrderCommand::createCommand( $this->builder, $this->orderRepository, $this->carrierRepository, $this->optionsProvider );
			WP_CLI::add_command( 'packeta-plugin-build-demo-order', $instance );
		}
		$this->hookRegistrar->register();
	}

	/**
	 * Hides submenu item. Must not be called too early.
	 *
	 * @param string $itemSlug Item slug.
	 */
	public static function hideSubmenuItem( string $itemSlug ): void {
		global $submenu;
		if ( isset( $submenu[ DashboardPage::SLUG ] ) ) {
			foreach ( $submenu[ DashboardPage::SLUG ] as $key => $menu ) {
				if ( $itemSlug === $menu[2] ) {
					unset( $submenu[ DashboardPage::SLUG ][ $key ] );
				}
			}
		}
	}

	/**
	 * Gets software identity for Packeta APIs.
	 *
	 * @return string
	 */
	public static function getAppIdentity(): string {
		return 'WordPress-' . get_bloginfo( 'version' ) . '-Woocommerce-' . WC_VERSION . '-Packeta-' . self::VERSION;
	}
}
