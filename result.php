<?php 
$arr1= Array
("
    [id] => chatcmpl-7v1KW7uxgKtzNiio9FOFujQy51bSI
    [object] => chat.completion
    [created] => 1693824164
    [model] => gpt-3.5-turbo-0613
    [choices] => Array
        (
            [0] => Array
                (
                    [index] => 0
                    [message] => Array
                        (
                            [role] => assistant
                            [content] => Virat Kohli is an Indian cricketer and former captain of the Indian national cricket team. He is considered one of the best batsmen in the world and has numerous records to his name. Kohli has represented India in all three formats of the game and has numerous achievements, including being the fastest player to score 8,000, 9,000, 10,000, 11,000, and 12,000 runs in One Day Internationals (ODIs). He has also been awarded the Sir Garfield Sobers Trophy for ICC Cricketer of the Year multiple times.
                        )

                    [finish_reason] => stop
                )

        )

    [usage] => Array
        (
            [prompt_tokens] => 18
            [completion_tokens] => 123
            [total_tokens] => 141
        )

;")

print_r($arr1);
?>