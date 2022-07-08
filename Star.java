import java.util.*;
import java.util.Scanner;
class Main
{
    public static void main(String[] args)
    {
        Scanner sc = new Scanner(System.in);
        String str = sc.nextLine();
        double num = Double.parseDouble(str);
        
        int count=5;
        while(count>0){
        	if(num>1){
        		System.out.print("full ");
        		num--;
        	}
        	else if(count>0 && num >0){
        		System.out.print("half ");
        		num--;
        	}
        	else {
        		System.out.print("empty ");
        	}
        	count--;
        }
         
    }
}