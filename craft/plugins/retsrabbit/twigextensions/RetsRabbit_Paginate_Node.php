<?php

namespace Craft;

class RetsRabbit_Paginate_Node extends \Twig_Node
{
	public function compile(\Twig_Compiler $compiler)
	{
		$compiler
			->addDebugInfo($this)
			->write('list(')
			->subcompile($this->getNode('paginateTarget'))
			->raw(', ')
			->subcompile($this->getNode('elementsTarget'))
			->raw(') = \Craft\RetsRabbit_TemplateHelper::paginateProperties(')
			->subcompile($this->getNode('criteria'))
			->raw(");\n");
	}
}
