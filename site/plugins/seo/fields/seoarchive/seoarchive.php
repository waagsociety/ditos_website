<?php
use Kirby\Panel\Models\Page\Blueprint;

class SeoarchiveField extends BaseField {
	static public $fieldname = 'seoarchive';
	static public $assets = array(
		'css' => array(
			'style.css',
		)
	);

	public function input() {
		if( class_exists('SeoCore') ) {
			// Load language file
			SeoCore::loadLanguage();

			$html = '';

			$get_page = get('seo-archive-page');
			$paging = ( isset( $get_page ) ) ? $get_page : 1;
			$limit = $this->page()->blueprint()->pages()->limit();
			$title = $this->page()->blueprint()->title();

			$yaml = $this->page()->blueprint()->yaml();
			$exclude = ( ! empty( $yaml['pages'] ) && ! empty( $yaml['pages']['exclude'] ) ) ? $yaml['pages']['exclude'] : null;

			$offset = $limit * ( $paging - 1 );
			$query = site()->index()->not($exclude)->slice($offset, $limit);
			$total = site()->index()->not($exclude)->count();
			
			$showing = $paging * $limit;

			$prev = ( $offset > 1 ) ? true : false;
			$next = ( $total <= $showing ) ? false : true;

			$paging_path = u() . '/panel/' . $this->page()->kirby()->path() . '?seo-archive-page=';

			foreach( $query as $page ) {
				$preview_text = '';
				$controller = SeoCore::panel($page);

				$controller['description']['fake'] = '';
				if( empty($controller['description']['full-replaced']) ) {
					$blueprint = new Blueprint('default');
					$fields = $blueprint->fields(null)->toArray();
					$preview_text = SeoCore::textsByFields($page, $fields);

					$preview_text = trim( $preview_text );
					$preview_text = ( ! empty( $preview_text ) ) ? $preview_text : l::get('description.empty');
					
					$preview_substr = substr( $preview_text, 0, 155 );
					$dots = ( $preview_text != $preview_substr ) ? '...' : '';
					$controller['description']['full-replaced'] = $preview_substr . $dots;
					$controller['description']['fake'] = ' data-seo-description-empty="true"';
				}

				$html .= tpl::load( __DIR__ . DS . 'template.php', $data = array(
					'page' => $page,
					'controller' => $controller,
				));
			}

			$prev_html = ( $prev === true ) ? '<a href="' . $paging_path . ( $paging - 1 ) . '" class="seo-prev"><i class="icon fa fa-chevron-left"></i></a>' : '';
			$next_html = ( $next === true ) ? '<a href="' .  $paging_path . ( $paging + 1 ) . '" class="seo-next"><i class="icon fa fa-chevron-right"></i></a>' : '';
			$paging = ( ! empty( $prev_html ) || ! empty( $next_html ) ) ? '<div class="seo-paging">' . $prev_html . $next_html . '</div>' : '';

			$title = '<label class="label" >' . $title . '</label>';
			return $title . '<div class="seo-archive">' . $html . '</div>' . $paging;
		} else {
			return l::get('plugin.required','Seo plugin is required!');
		}
	}
}