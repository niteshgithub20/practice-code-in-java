import java.util.*;
import java.util.Scanner;
public class Strong
{
    public static void main(String[] args){
        Scanner sc = new Scanner(System.in);
        System.out.println("Enter the number : ");
        int num,digit,abtakkaprod,sum,first,i;
        num = sc.nextInt();
        first = num;
        sum = 0;
        while(num>0)
        {
            digit = num%10;
            num = num/10;
            abtakkaprod=1;
            for(i=1;i<=digit;i++)
            {
                abtakkaprod = abtakkaprod*i;
            }
            sum = sum+abtakkaprod;
        }
        if(sum == first)
        {
            System.out.println("This is Strong number: "+first);
        }
        else
        {
            System.out.println("This is Not Strong: "+first);
        }
        
    }
    
}