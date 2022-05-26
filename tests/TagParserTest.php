<?php
namespace Tests;

use App\TagParser;
use PHPUnit\Framework\TestCase;

class TagParserTest extends TestCase
{
    // protected TagParser $parser;

    // protected function setUp(): void
    // {
    //     $this->parser = new TagParser;
    // } // setUp

    /**
     * @dataProvider tagsProvider
     */
    public function test_it_parses_tags($input, $expected)
    {
        // $result = $this->parser->parse($input);
        $parser = new TagParser;
        $result = $parser->parse($input);

        $this->assertSame($expected, $result);
    } // test_it_parses_tags

    public function tagsProvider() 
    {
        return [
            /* Structure:
                array(input, expected_result)
            */
            array("personal", array("personal")),
            array("personal, money, family", array("personal", "money", "family")),
            array("personal,money,family", array("personal", "money", "family")),
            array("personal | money | family", array("personal", "money", "family")),
            array("personal|money|family", array("personal", "money", "family")),
            array("personal!money!family", array("personal", "money", "family")),
        ];
    }

    // personal, money, family
    // Commented because it is solved by tagsProvider

    // public function test_it_parses_a_single_tag()
    // {
    //     // PHP unit Jargon 
    //     // Given | Arrange
    //     // $parser = new TagParser;

    //     // When | Act
    //     $result = $this->parser->parse('personal');
    //     $expected = ['personal'];

    //     // Then | Assert
    //     $this->assertSame($expected, $result);
    // }

    // public function test_it_parses_a_comma_separated_list_of_tags()
    // {
    //     // $parser = new TagParser;
    //     $result = $this->parser->parse('personal, money, family');
    //     $expected = ['personal', 'money', 'family'];

    //     $this->assertSame($expected, $result);
    // }

    // public function test_it_parses_a_pipe_separated_list_of_tags()
    // {
    //     // $parser = new TagParser;
        
    //     $result = $this->parser->parse('personal | money | family');
    //     $expected = ['personal', 'money', 'family'];
    //     $this->assertSame($expected, $result);
    // }

    // public function test_spaces_are_optional()
    // {
    //     // $parser = new TagParser;

    //     $result = $this->parser->parse('personal,money,family');
    //     $expected = ['personal', 'money', 'family'];
    //     $this->assertSame($expected, $result);

    //     $result = $this->parser->parse('personal|money| family');
    //     $expected = ['personal', 'money', 'family'];
    //     $this->assertSame($expected, $result);
    // }
}