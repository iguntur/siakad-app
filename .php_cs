<?php

use PhpCsFixer\Finder;
use PhpCsFixer\Config;

$finder = Finder::create()
	->exclude('system')
	->in(__DIR__)
;

return Config::create()
	->setCacheFile(__DIR__.'/.cache/.php_cs.cache')
	->setUsingCache(false)
	->setFinder($finder)
	->setIndent("\t")
	->setRules([
		'@PSR2' => true,
		'array_syntax' => [
			'syntax' => 'short',
		],
		'binary_operator_spaces' => [
			'align_double_arrow' => false,
			'align_equals' => false,
		],
		'blank_line_after_opening_tag' => true,
		'blank_line_before_statement' => [
			'statements' => [
				'continue',
				'declare',
				'return', // alias: blank_line_before_return
				'throw',
				'break',
				'exit',
				'try',
				'foreach',
				'if',
			],
		],
		'braces' => true,
		'cast_spaces' => [
			'space' => 'single',
		],
		'class_attributes_separation' => true, // alias: method_separation
		'class_definition' => true,
		'combine_consecutive_unsets' => true,
		'concat_space' => [
			'spacing' => 'one',
		],
		'declare_equal_normalize' => [
			'space' => 'single',
		],
		'elseif' => true,
		'encoding' => true,
		'full_opening_tag' => true,
		'function_declaration' => true,
		'function_typehint_space' => true,
		'header_comment' => false,
		'include' => true,
		'indentation_type' => true,
		'linebreak_after_opening_tag' => true,
		'lowercase_cast' => true,
		'lowercase_constants' => true,
		'lowercase_keywords' => true,
		'method_argument_space' => true,
		'method_chaining_indentation' => true,
		// 'modernize_types_casting' => true, // [@Symfony:risky]
		'native_function_casing' => true,
		'new_with_braces' => true,
		// 'no_alias_functions' => true, // [@Symfony:risky]
		'no_blank_lines_after_class_opening' => true,
		'no_closing_tag' => true,
		'no_empty_comment' => true,
		'no_empty_phpdoc' => true,
		'no_empty_statement' => true,
		'no_extra_blank_lines' => true, // alias: no_extra_consecutive_blank_lines
		'no_leading_namespace_whitespace' => true,
		'no_multiline_whitespace_around_double_arrow' => true,
		'no_multiline_whitespace_before_semicolons' => true,
		'no_short_bool_cast' => true,
		'no_short_echo_tag' => true,
		'no_singleline_whitespace_before_semicolons' => true,
		'no_spaces_after_function_name' => true,
		'no_spaces_around_offset' => true,
		'no_spaces_inside_parenthesis' => true,
		'no_superfluous_elseif' => true,
		'no_trailing_comma_in_list_call' => true,
		'no_trailing_comma_in_singleline_array' => true,
		'no_trailing_whitespace' => true,
		'no_trailing_whitespace_in_comment' => true,
		'no_unneeded_control_parentheses' => true,
		'no_unneeded_curly_braces' => true,
		'no_useless_else' => true,
		'no_useless_return' => true,
		'no_whitespace_before_comma_in_array' => true,
		'no_whitespace_in_blank_line' => true,
		'normalize_index_brace' => true,
		'not_operator_with_successor_space' => true,
		'object_operator_without_whitespace' => true,
		'phpdoc_indent' => true,
		'phpdoc_inline_tag' => true,
		// 'psr4' => true,
		'return_type_declaration' => true,
		// 'self_accessor' => true, // [@Symfony:risky]
		'semicolon_after_instruction' => true,
		'short_scalar_cast' => true,
		'simplified_null_return' => false,
		'single_blank_line_at_eof' => true,
		'single_blank_line_before_namespace' => true,
		'single_class_element_per_statement' => true,
		'single_import_per_statement' => true,
		'single_line_after_imports' => true,
		'single_line_comment_style' => true,
		'single_quote' => true,
		'standardize_not_equals' => true,
		// Changing comparisons to strict might change code behavior.
		// 'strict_comparison' => true,
		'switch_case_semicolon_to_colon' => true,
		'switch_case_space' => true,
		'ternary_operator_spaces' => true,
		'trailing_comma_in_multiline_array' => true,
		'trim_array_spaces' => true,
		'unary_operator_spaces' => true,
		'visibility_required' => true,
		'whitespace_after_comma_in_array' => true,
	])
;
