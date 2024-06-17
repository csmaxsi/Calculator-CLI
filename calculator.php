<?php
class Calculator
{
    protected function calCircle(): void
    {
        $radius = $this->getAnswer("Enter Radius: ");
        $area = 2*(22/7)*$radius;
        $perimeter = 2*(22/7)*($radius);
        echo "\nArea is : $area";
        echo "\nperimeter is : $perimeter\n";  
    }
    
    protected function calRectangle() : void
    {
        $width = $this->getAnswer("Enter width: ");
        $height = $this->getAnswer("Enter height: ");
        $area = $width*$height;
        $perimeter = 2*($width+$height);
        echo "\nArea is : $area";
        echo "\nperimeter is : $perimeter\n";
    }
    
    protected function calSquare() : void
    {
        $length= $this->getAnswer("Enter length: ");
        $area = $length*$length;
        $perimeter = 4*($length);
        echo "\nArea is : $area";
        echo "\nperimeter is : $perimeter\n";
    }
}


class CalCommandPrompt extends Calculator
{   

    public function startFlow(): void
    {
        $this->showMainMessage();
        $answer = $this->getAnswer("");
        
        
        switch($answer)
        {   
            case 1:
                $this->calCircle();
                break;
                
            case 2:
                $this->calRectangle();
                break;
                
            case 3:
                $this->calSquare();
                break;
            case 4:
                exit;
            default:
                $this->showMessage("Unsupported input");
                break;
                
        }
        
        $this->startFlow();
    }
    
    
    
    public function showMessage(string $message): void
    {
        echo $message;
    }
    
    public function getAnswer(string $question): string 
    {
        $answer=readline($question);
        return $answer;
    }
    
    public function showMainMessage(): void
    {
        $this->showMessage("\nchoose an option : \n\n1. Calculate Circle \n2. Calculate Rectangle \n3. Calculate Square \n4. Exit\n");
    }
}


$cal = new CalCommandPrompt();
$cal->startFlow();

?>
